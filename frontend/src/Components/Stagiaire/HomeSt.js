// Components/Home.js
import React from 'react';

function HomeSt() {
  return (
    <div style={{
      display: 'flex',
      flexDirection: 'column',
      justifyContent: 'center',
      alignItems: 'center',
      minHeight: '100vh',
      textAlign: 'center'
    }}>
      <h2 style={{ marginBottom: '20px' }}>
        Bienvenue sur notre site, comment pouvons-nous vous aider ?
      </h2>
    </div>
  );
}

export default HomeSt;
