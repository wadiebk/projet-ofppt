import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Sidebar from './Components/Admin/Sidebar';
import Topbar from './Components/Admin/Topbar';
import "./sb-admin-2.min.css";
import Dashboard from './Components/Admin/Dashboard';
import Login from './Components/Admin/Login';
import Userlist from './Components/Admin/Userlist';
import Portal from './Components/Admin/Portal';
import UserCreate from './Components/Admin/UserCreate';
import UserView from './Components/Admin/UserView';
import UserEdit from './Components/Admin/UserEdit';
import Home from './Components/Home';
import User from './Components/Stagiaire/User';
import Stagiaire from './Components/Stagiaire/Stagiaire';
import Demandes from './Components/Stagiaire/Demandes';
import Documents from './Components/Stagiaire/Documents';
import EmploiDuTemps from './Components/Stagiaire/EmploiDuTemps';
import HomeSt from './Components/Stagiaire/HomeSt';

function App() {
  return (
    <Routes>
      {/* Routes pour l'interface d'administration */}
      <Route path='/Admin' element={<Login />} />
      <Route path='/Admin/portal' element={<Portal />}> 
        <Route path='dashboard' element={<Dashboard />} />
        <Route path='user-list' element={<Userlist />} />
        <Route path='create-user' element={<UserCreate />} />
        <Route path="/Admin/portal/user-view/:id" component={UserView} />
        <Route path="/Admin/portal/user-edit/:id" component={UserEdit} />
      </Route>

      {/* Routes pour l'interface utilisateur */}
      <Route path='/' element={<Home />} />
      <Route path='/User' element={<User />} />
      <Route path='/user/stagiaire' element={<Stagiaire />}>
        <Route path="/user/stagiaire" element={<HomeSt />} /> {/* Utilisation du chemin relatif */}
        <Route path="demandes" element={<Demandes />} />
        <Route path="documents" element={<Documents />} />
        <Route path="emploi-du-temps" element={<EmploiDuTemps />} />
      </Route>
    </Routes>
  );
}

export default App;
