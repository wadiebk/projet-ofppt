// Components/Documents.js
import React from 'react';

function Documents() {
  const telechargerDocument = (document) => {
    // Logique pour télécharger le document
    console.log('Téléchargement du document :', document);
  };

  return (
    <div className="documents-container">
      <h2>Documents de Stage</h2><br></br>
      <label>Convention de Stage :</label>  
      <button onClick={() => telechargerDocument('Document 1')}>Télécharger Document 1</button><br></br><br></br>
      <label>Accord du Stage :</label>
      <button onClick={() => telechargerDocument('Document 2')}>Télécharger Document 2</button><br></br><br></br>
      <label>Assurance :</label>
      <button onClick={() => telechargerDocument('Document 3')}>Télécharger Document 3</button>
    </div>
  );
}

export default Documents;

// Intégration du CSS
const styles = `
  .documents-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
    width: 80%;
    margin: 0 auto;
  }

  .documents-container h2 {
    margin-bottom: 10px;
    text-align: center;
  }

  .documents-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .documents-container button {
    display: block;
    margin-bottom: 10px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    width: 100%;
    text-align: center;
  }

  .documents-container button:hover {
    background-color: #0056b3;
  }
`;

// Création de la balise de style
const styleElement = document.createElement('style');
styleElement.innerHTML = styles;
document.head.appendChild(styleElement);
