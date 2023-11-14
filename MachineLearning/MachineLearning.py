## Data Preparation
import pandas as pd
import numpy as np
import re
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer
from imblearn.over_sampling import SMOTE
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.metrics import classification_report, accuracy_score 
from joblib import dump

np.set_printoptions(threshold=np.inf)

# Load the dataset
columns = ['text', 'polarity', 'score']
file_path = r'C:\xampp\htdocs\SA_Shopping\MachineLearning\review.csv'
df = pd.read_csv(file_path, header=None, names=columns, encoding='ISO-8859-1')

## Clean dataset
# Create a mask to identify rows where 'text' is not a float
mask = pd.notna(df['text']) & df['text'].apply(lambda x: not isinstance(x, float))

# Create a new DataFrame without rows where 'text' is a float
df_filtered = df[mask]

# Reset the index
df_filtered.reset_index(drop=True, inplace=True)

## Data Cleaning and Preprocessing
line = 1
def clean_text(text):
    global line
    print(line)
    text = re.sub('@[A-Za-z0-9_]+', '', text)  # Remove @mentions
    text = re.sub('https?://[A-Za-z0-9./]+', '', text)  # Remove URLs
    text = re.sub('[^a-zA-Z]', ' ', text)  # Remove non-alphabetic characters
    text = text.lower()  # Convert to lowercase
    text = word_tokenize(text)  # Tokenization
    text = [word for word in text if word not in set(stopwords.words('english'))]  # Remove stopwords
    stemmer = PorterStemmer()
    text = [stemmer.stem(word) for word in text]  # Stemming
    print(text)
    line += 1
    return ' '.join(text)
df['cleaned_text'] = df_filtered['text'].apply(clean_text)

df['cleaned_text'] = df['cleaned_text'].fillna('')  # Replace NaN values with an empty string

## Data Splitting
X = df['cleaned_text']
y = df['polarity']

# Split the dataset into training and testing sets.
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

## Feature Extraction (TF-IDF)
tfidf_vectorizer = TfidfVectorizer(max_features=5000)  # You can adjust the max_features
X_train_tfidf = tfidf_vectorizer.fit_transform(X_train.astype('U'))
X_test_tfidf = tfidf_vectorizer.transform(X_test)

## Model Building (Multinomial Naive Bayes)
nb_classifier = MultinomialNB()
nb_classifier.fit(X_train_tfidf, y_train)

y_pred = nb_classifier.predict(X_test_tfidf)

print("Accuracy:", accuracy_score(y_test, y_pred))
print(classification_report(y_test, y_pred))

## Fix oversampling
X_resampled, y_resampled = SMOTE().fit_resample(X_train_tfidf, y_train)

## Model Building (Multinomial Naive Bayes)
# # Use X_resampled and y_resampled for training your model
nb_classifier2 = MultinomialNB()
nb_classifier2.fit(X_resampled, y_resampled)

y_pred2 = nb_classifier2.predict(X_test_tfidf)

print("Accuracy:", accuracy_score(y_test, y_pred2))
print(classification_report(y_test, y_pred2))

## Prediction
tweet=['''I like it, it fits my weight well ''']
new_tweets_tfidf = tfidf_vectorizer.transform(tweet)

nb_sentiments = nb_classifier.predict(new_tweets_tfidf)

print("1st model Sentiments (Naive Bayes):", nb_sentiments)

nb_sentiments2 = nb_classifier2.predict(new_tweets_tfidf)

print("2nd model Sentiments (Naive Bayes):", nb_sentiments2)

dump((tfidf_vectorizer, nb_classifier), 'tfidf_nb_model.pkl')
dump((tfidf_vectorizer, nb_classifier2), 'tfidf_resample_nb_model.pkl')

print("EOF")