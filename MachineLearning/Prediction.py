from joblib import load
from scipy.sparse import csr_matrix, hstack
from flask import Flask, request, jsonify
from nltk.sentiment import SentimentIntensityAnalyzer
import cv2

app = Flask(__name__)

@app.route('/process_data', methods=['POST'])
def process_data():
    try:
        json_data = request.get_json()  # Assuming data is sent in JSON format
        text = json_data.get('text', '')
        
        print("Received request with text:", text)
        # Prediction
        nb_file_path = r'C:\xampp\htdocs\SA_Shopping\MachineLearning\unibigram_tfidf_nb_model.pkl'
        nn_file_path = r'C:\xampp\htdocs\SA_Shopping\MachineLearning\nb_nn_model(5).pkl'
        loaded_tfidf_vectorizer, loaded_nb_classifier = load(nb_file_path)
        loaded_nn_classifier = load(nn_file_path)
        
        data = [f'''{text}''']
        new_data_tfidf = loaded_tfidf_vectorizer.transform(data)
        new_proba = loaded_nb_classifier.predict_proba(new_data_tfidf)
        new_combined = hstack([new_data_tfidf, csr_matrix(new_proba)])
        nb_sentiments = loaded_nn_classifier.predict(new_combined)
        sia = SentimentIntensityAnalyzer()
        polarity = sia.polarity_scores(data[0])['compound']
        if nb_sentiments == 2:
            # pos
            if polarity > 0.75:
                sentiment = 3
            elif polarity > 0.5:
                sentiment = 2
            else:
                sentiment = 1
        else:
            # neg
            if polarity < -0.75:
                sentiment = -3
            elif polarity < -0.5:
                sentiment = -2
            else:
                sentiment = -1
        print(f"Sentiments (Naive Bayes): {nb_sentiments} {polarity} ")
        result = {'result': sentiment}
        
        print("Sentiments (final):", sentiment)
        return jsonify(result)
    except Exception as e:
        error_message = {'error': str(e)}
        return jsonify(error_message), 500

@app.route('/blurry_image', methods=['POST'])
def blurry_image():
    ### Laplacian transform on images, take variance -> detect the blurry-ness
    # explanation: sellers ideally wont't upload blurry images, 
    # but help ensure that the images meet certain standards for clarity, visibility, and overall visual appeal
    ### require web system to store image temporarily 1st
    THRESHOLD = 110
    
    try:
        json_data = request.get_json()  # Assuming data is sent in JSON format
        image_path = json_data.get('file_path', '')
        
        print("Received request with image path:", image_path)
        # read image
        image = cv2.imread(image_path)
        
        if image is None:
            print(f"Error: Unable to load image at {image_path}")
            exit()
        
        # convert image to grayscale
        grayscale = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
        # get variance
        focus_measure = cv2.Laplacian(grayscale, cv2.CV_64F).var()
        # compare with threshold
        result = "Blurry" if focus_measure < THRESHOLD else "Sharp"
        # return blurryness
        print(result, focus_measure)
        result = {'result': result}
        return jsonify(result)
    except cv2.error as e:
        print(f"Error: {e}")
        error_message = {'error': str(e)}
        return jsonify(error_message), 500
    except Exception as e:
        print(f"An unexpected error occurred: {e}")
        error_message = {'An unexpected error occurred:': str(e)}
        return jsonify(error_message), 500

if __name__ == '__main__':
    app.run(debug=True)