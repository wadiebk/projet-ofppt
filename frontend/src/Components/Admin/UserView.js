// UserView.js
import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

function UserView() {
    const { id } = useParams();
    const [user, setUser] = useState(null);
    const [isLoading, setLoading] = useState(true);

    useEffect(() => {
        getUserData();
    }, []);

    const getUserData = async () => {
        try {
            const response = await axios.get(`https://63a9bccb7d7edb3ae616b639.mockapi.io/users/${id}`);
            setUser(response.data);
            setLoading(false);
        } catch (error) {
            console.error("Error fetching user data:", error);
            setLoading(false);
        }
    };

    return (
        <div>
            {isLoading ? (
                <div>Loading...</div>
            ) : user ? (
                <div>
                    <h1>UserView - ID: {id}</h1>
                    <p>Nom: {user.username}</p>
                    <p>Email: {user.email}</p>
                    <p>Groupe: {user.group}</p>
                    <p>Niveau: {user.level}</p>
                    <p>Numéro de téléphone: {user.phone}</p>
                </div>
            ) : (
                <div>User not found</div>
            )}
        </div>
    );
}

export default UserView;
