import React from 'react';
import { MDBContainer, MDBCol, MDBRow, MDBBtn, MDBIcon, MDBInput, MDBCheckbox } from 'mdb-react-ui-kit';
import { Routes, Route } from 'react-router-dom';



function Admin() {
  return (
    <MDBContainer fluid className="p-3 my-5 h-custom">

      <MDBRow>

        <MDBCol col='10' md='6'>
          <img src="https://img.freepik.com/vecteurs-libre/illustration-du-concept-equipe-ui-ux_114360-11223.jpg?w=900&t=st=1714416601~exp=1714417201~hmac=80ecb9e4dac335044eb455c045d48e92c87404f15c9d7dea0877d6c975da7259" className="img-fluid" alt="Modern Image" />
        </MDBCol>

        <MDBCol col='4' md='6'>

          <h2 className="mb-4">Espace Admin</h2> {/* Titre ajouté ici */}

          <div className="divider d-flex align-items-center my-4">
            <p className="text-center fw-bold mx-3 mb-0"></p>
          </div>

          <MDBInput wrapperClass='mb-4' label='Mail ou Cin' id='formControlLg' type='email' size="lg"/>
          <MDBInput wrapperClass='mb-4' label='Password' id='formControlLg' type='password' size="lg"/>

          <div className="d-flex justify-content-between mb-4">
            <MDBCheckbox name='flexCheck' value='' id='flexCheckDefault' label='Remember me' />
            <a href="!#">Forgot password?</a>
          </div>

          <div className='text-center text-md-start mt-4 pt-2'>
            <MDBBtn className="mb-0 px-5" size='lg'>Connexion</MDBBtn>
          </div>

        </MDBCol>

      </MDBRow>
    </MDBContainer>

  );
}

export default Admin;
