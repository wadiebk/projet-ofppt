import React from 'react';
import './Auth.css';
import Ofppt from './assets/ofppt-logo-png.png'

export default function Authen() {
  return (
    <section className='w-100'>
      <div className='row w-100 d-flex justify-content-center pt-5'>
        <img src={Ofppt} alt='ofppt' style={{ width: '25%' }} />
      </div>
      <div className='pt-5'>
        <form>
          <div className='row row w-100 d-flex justify-content-center mb-4'>
            <div className='col-4 text-end my-auto'>
              Login
            </div>
            <div className='col-5'>
              <input className='form-control w-50' placeholder='Enter Your Login' />
            </div>
          </div>
          <div className='row row w-100 d-flex justify-content-center mb-4'>
            <div className='col-4 text-end my-auto'>
              Password
            </div>
            <div className='col-5'>
              <input type='password' className='form-control w-50' placeholder='Enter Your Password' />
            </div>
          </div>
          <div className='row row w-100 d-flex justify-content-center mb-4'>
            <div className='col-4 text-end my-auto'>
              &nbsp;
            </div>
            <div className='col-5'>
            <button className='btn btn-primary' type='submit'>Login</button> <br/>
            </div>
          </div>
        </form>
      </div>
    </section>
  );
}