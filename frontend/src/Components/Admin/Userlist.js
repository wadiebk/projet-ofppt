import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function UserList() {
    const [userList, setUserList] = useState([]);
    const [isLoading, setLoading] = useState(true);

    useEffect(() => {
        getUsers();
    }, []);

    const getUsers = async () => {
        try {
            const response = await axios.get("https://63a9bccb7d7edb3ae616b639.mockapi.io/users");
            setUserList(response.data);
            setLoading(false);
        } catch (error) {
            console.error("Error fetching user list:", error);
            setLoading(false);
        }
    };

    const handleDelete = async (id) => {
        try {
            const confirmDelete = window.confirm("Are you sure you want to delete the user?");
            if (confirmDelete) {
                await axios.delete(`https://63a9bccb7d7edb3ae616b639.mockapi.io/users/${id}`);
                getUsers();
            }
        } catch (error) {
            console.error("Error deleting user:", error);
        }
    };

    return (
        <>
            <div className="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 className="h3 mb-0 text-gray-800">Liste des utilisateurs</h1>
                <Link to="/Admin/portal/create-user" className="btn btn-sm btn-primary shadow-sm">
                    Créer un utilisateur
                </Link>
            </div>
            <div className="card shadow mb-4">
                <div className="card-header py-3">
                    <h6 className="m-0 font-weight-bold text-primary">Données des utilisateurs</h6>
                </div>
                <div className="card-body">
                    {isLoading ? (
                        <div>Loading...</div>
                    ) : (
                        <div className="table-responsive">
                            <table className="table table-bordered" id="dataTable" width="100%" cellSpacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Groupe</th>
                                        <th>Niveau</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {userList.map((user) => (
                                        <tr key={user.id}>
                                            <td>{user.id}</td>
                                            <td>{user.username}</td>
                                            <td>{user.email}</td>
                                            <td>{user.group}</td>
                                            <td>{user.level}</td>
                                            <td>{user.phone}</td>
                                            <th>
                                              {/* Commentaire pour le bouton "Voir" */}
{/* <Link to={`/Admin/portal/user-view/${user.id}`} className='btn btn-primary btn-sm mr-1'>Voir</Link> */}

{/* Commentaire pour le bouton "Modifier" */}
{/* <Link to={`/Admin/portal/user-edit/${user.id}`} className='btn btn-info btn-sm mr-1'>Modifier</Link> */}
                                                <button onClick={() => handleDelete(user.id)} className='btn btn-danger btn-sm mr-1'>Supprimer</button>
                                            </th>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    )}

                </div>
            </div>
        </>
    );
}

export default UserList;
