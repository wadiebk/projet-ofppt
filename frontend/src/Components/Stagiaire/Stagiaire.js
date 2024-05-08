import React from 'react';
import { Link, Outlet } from 'react-router-dom';

function Stagiaire() {
  return (
    <div style={{ display: 'flex', flexDirection: 'column', height: '100%', alignItems: 'center' }}>
      {/* Navbar */}
      <nav style={{ backgroundColor: '#f8f9fa', borderBottom: '1px solid #dee2e6', padding: '10px 0', width: '100%', maxWidth: '800px' }}>
        <ul style={{ display: 'flex', justifyContent: 'center', listStyleType: 'none', margin: 0, padding: 0 }}>
          <li style={{ marginRight: '20px' }}>
            <Link to="demandes" style={{ color: '#007bff', textDecoration: 'none', fontWeight: 'bold', transition: 'color 0.3s ease' }}>Les Demandes</Link>
          </li>
          <li style={{ marginRight: '20px' }}>
            <Link to="documents" style={{ color: '#007bff', textDecoration: 'none', fontWeight: 'bold', transition: 'color 0.3s ease' }}>Documents de Stage</Link>
          </li>
          <li style={{ marginRight: '20px' }}>
            <Link to="emploi-du-temps" style={{ color: '#007bff', textDecoration: 'none', fontWeight: 'bold', transition: 'color 0.3s ease' }}>Emploi du Temps</Link>
          </li>
        </ul>
      </nav>
      {/* Contenu */}
      <div style={{ flex: 1, padding: '20px', width: '100%', maxWidth: '800px' }}>
        {/* Le contenu de chaque section sera chargé ici en fonction de l'URL */}
        <Outlet />
      </div>
    </div>
  );
}

export default Stagiaire;
