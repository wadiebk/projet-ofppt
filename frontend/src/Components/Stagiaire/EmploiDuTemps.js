// Components/EmploiDuTemps.js
import React from 'react';

function EmploiDuTemps() {
  const telechargerEmploiDuTemps = () => {
    // Logique pour télécharger l'emploi du temps
    console.log('Téléchargement de l\'emploi du temps');
  };

  return (
    <div className="emploi-du-temps-container">
      <h2>Emploi du Temps</h2>
      <button onClick={telechargerEmploiDuTemps}>Téléchargez votre emploi de cette semaine</button>
    </div>
  );
}

export default EmploiDuTemps;

// CSS
const styles = `
  .emploi-du-temps-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
  }

  .emploi-du-temps-container h2 {
    margin-bottom: 10px;
  }

  .emploi-du-temps-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
  }

  .emploi-du-temps-container button:hover {
    background-color: #0056b3;
  }
`;

// Création de la balise de style
const styleElement = document.createElement('style');
styleElement.innerHTML = styles;
document.head.appendChild(styleElement);
