from joblib import load
from scipy.sparse import csr_matrix, hstack
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/process_data', methods=['POST'])
def process_data():
    try:
        json_data = request.get_json()  # Assuming data is sent in JSON format
        text = json_data.get('text', '')
        
        print("Received request with text:", text)
        # Prediction
        nb_file_path = r'C:\xampp\htdocs\SA_Shopping\MachineLearning\unibigram_tfidf_nb_model.pkl'
        nn_file_path = r'C:\xampp\htdocs\SA_Shopping\MachineLearning\nb_nn_model.pkl'
        loaded_tfidf_vectorizer, loaded_nb_classifier = load(nb_file_path)
        loaded_tfidf_proba, loaded_nn_classifier = load(nn_file_path)
        
        data = [f'''{text}''']
        new_data_tfidf = loaded_tfidf_vectorizer.transform(data)
        new_proba = loaded_nb_classifier.predict_proba(new_data_tfidf)
        new_combined = hstack([new_data_tfidf, csr_matrix(new_proba)])
        nb_sentiments = loaded_nn_classifier.predict(new_combined)
        print(f"Sentiments (Naive Bayes): {nb_sentiments} {new_combined}")
        result = {'result': int(nb_sentiments[0])}
        
        print("Sentiments (Naive Bayes):", nb_sentiments)
        return jsonify(result)
    except Exception as e:
        error_message = {'error': str(e)}
        return jsonify(error_message), 500

if __name__ == '__main__':
    app.run(debug=True)