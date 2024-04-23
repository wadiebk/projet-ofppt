import React from 'react'
import './Formu.css'
import { Link, Outlet } from 'react-router-dom';

export default function Formu() {
  return (
    <section>
      <div className='row w-100 vh-100'>
        <div className='col-3 border-end border-2 border-dark'>
          <div className='p-3 border-bottom  border-2 border-dark'>
            <p>nom et prenom:</p>
            <p>groupe:</p>
          </div>
          <div className='p-3'>
            <ul className='listes'>
              <li><span><Link to="/form">Demande Attestation scolaire</Link></span></li>
              <li><span><Link to="/form/releve">Demande releve</Link></span></li>
              <li><span><Link to="/form/stage">Telecharger stage</Link></span></li>
              <li><span><Link to="/form/emploie">Emploie de temps</Link></span></li>
            </ul>
          </div>
        </div>
        <div className='col-9'>
          <div className=' m-3 w-100'>
            <Outlet />
          </div>
        </div>
      </div>
    </section>
  )
}
