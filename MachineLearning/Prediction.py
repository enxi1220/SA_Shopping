from joblib import load

loaded_tfidf_vectorizer, loaded_nb_classifier = load('tfidf_nb_model.pkl')
## Prediction
tweet=['''This shirt style is boxy, however, the material is soft and this shirt is very comfortable. i love the look of the cuffs. this is a fun shirt to wear ''']
new_tweets_tfidf = loaded_tfidf_vectorizer.transform(tweet)

nb_sentiments = loaded_nb_classifier.predict(new_tweets_tfidf)

print("Sentiments (Naive Bayes):", nb_sentiments)

print("EOF")