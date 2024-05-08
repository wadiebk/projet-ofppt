// Components/Demandes.js
import React, { useState } from 'react';

function Demandes() {
  const [nom, setNom] = useState('');
  const [groupe, setGroupe] = useState('');
  const [typeDemande, setTypeDemande] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    // Logique pour soumettre la demande
    console.log('Demande soumise :', { nom, groupe, typeDemande });
    // Réinitialiser les champs après la soumission
    setNom('');
    setGroupe('');
    setTypeDemande('');
  };

  return (
    <div className="demandes-container">
      <h2>Demandes</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="nom">Nom et Prenom:</label>
          <input type="text" id="nom" value={nom} onChange={(e) => setNom(e.target.value)} />
        </div>
        <div>
          <label htmlFor="groupe">Groupe :</label>
          <input type="text" id="groupe" value={groupe} onChange={(e) => setGroupe(e.target.value)} />
        </div>
        <div>
          <label htmlFor="typeDemande">Type de demande :</label>
          <select id="typeDemande" value={typeDemande} onChange={(e) => setTypeDemande(e.target.value)}>
            <option value="">Sélectionnez le type de demande</option>
            <option value="Relevé de note">Relevé de note</option>
            <option value="Attestation scolaire">Attestation scolaire</option>
          </select>
        </div>
        <button type="submit">Soumettre la demande</button>
      </form>
    </div>
  );
}

export default Demandes;

// Intégration du CSS
const styles = `
  .demandes-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
  }

  .demandes-container h2 {
    margin-bottom: 10px;
  }

  .demandes-container form {
    display: flex;
    flex-direction: column;
  }

  .demandes-container form div {
    margin-bottom: 10px;
  }

  .demandes-container label {
    font-weight: bold;
  }

  .demandes-container input,
  .demandes-container select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .demandes-container button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }

  .demandes-container button:hover {
    background-color: #0056b3;
  }
`;

// Création de la balise de style
const styleElement = document.createElement('style');
styleElement.innerHTML = styles;
document.head.appendChild(styleElement);
