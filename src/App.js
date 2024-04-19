import { createBrowserRouter } from 'react-router-dom';
import React from 'react';

import Index from './components/Index';
import Authen from './components/Authen';
import Formu from './components/Formu';
import Attestation from './components/Attestation';
import Releve from './components/Releve';
import Stage from './components/Stage';
import Emploie from './components/Emploie';

const Routes = createBrowserRouter([
  {
    path: '/',
    element: <Index />,
    children: [
      {
        index: true,
        element: <Authen />
      },
      {
        path: "/form/",
        element: <Formu/>,
        children: [
          {
            index: true,
            element: <Attestation/>,
          },
          {
            path: 'releve',            
            element: <Releve/>,
          },
          {
            path: 'stage',            
            element: <Stage/>,
          },
          {
            path: 'emploie',            
            element: <Emploie/>,
          },
        ],
      }
      
    ]
  }
]);

export default Routes;
