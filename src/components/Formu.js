import React from 'react'
import './Formu.css'
import { Outlet } from 'react-router-dom';

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
              <li><span><a href="/form">Demande Attestation scolaire</a></span></li>
              <li><span><a href="/form/releve">Demande releve</a></span></li>
              <li><span><a href="/form/stage">Telecharger stage</a></span></li>
              <li><span><a href="/form/emploie">Emploie de temps</a></span></li>
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
