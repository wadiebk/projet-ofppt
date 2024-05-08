import axios from 'axios';
import { useFormik } from 'formik';
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function UserCreate() {
    const [isLoading, setLoading] = useState(false);
    const navigate = useNavigate();

    const myFormik = useFormik({
        initialValues: {
            username: "",
            email: "",
            group: "",
            level: "",
            phone: ""
        },
        // Validation des champs du formulaire
        validate: (values) => {
            let errors = {};

            if (!values.username) {
                errors.username = "Veuillez entrer un nom d'utilisateur";
            } else if (values.username.length < 3) {
                errors.username = "Le nom d'utilisateur doit comporter au moins 3 caractères";
            } else if (values.username.length > 20) {
                errors.username = "Le nom d'utilisateur ne doit pas dépasser 20 caractères";
            }

            if (!values.email) {
                errors.email = "Veuillez entrer une adresse e-mail";
            } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(values.email)) {
                errors.email = 'Adresse e-mail invalide';
            }

            if (!values.group) {
                errors.group = "Veuillez saisir un groupe";
            }

            if (!values.level) {
                errors.level = "Veuillez saisir un niveau";
            }

            if (!values.phone) {
                errors.phone = "Veuillez saisir un numéro de téléphone";
            }

            return errors;
        },
        // Soumission du formulaire
        onSubmit: async (values) => {
            try {
                setLoading(true);
                await axios.post("https://63a9bccb7d7edb3ae616b639.mockapi.io/users", values);
                navigate("/Admin/portal/user-list");
            } catch (error) {
                console.log(error);
                alert("La validation a échoué");
                setLoading(false);
            }
        }
    });

    return (
        <div className='container'>
            <form onSubmit={myFormik.handleSubmit}>
                <div className='row'>
                    <div className="col-lg-6">
                        <label>Nom</label>
                        <input name='username' value={myFormik.values.username} onChange={myFormik.handleChange} type={"text"}
                            className={`form-control ${myFormik.errors.username ? "is-invalid" : ""} `} />
                        <span style={{ color: "red" }}>{myFormik.errors.username}</span>
                    </div>

                    <div className="col-lg-6">
                        <label>E-Mail</label>
                        <input name='email' value={myFormik.values.email} onChange={myFormik.handleChange} type={"mail"}
                            className={`form-control ${myFormik.errors.email ? "is-invalid" : ""} `} />
                        <span style={{ color: "red" }}>{myFormik.errors.email}</span>
                    </div>

                    <div className='col-lg-4'>
                        <label>Groupe</label>
                        <input name='group' value={myFormik.values.group} onChange={myFormik.handleChange} type={"text"}
                            className={`form-control ${myFormik.errors.group ? "is-invalid" : ""} `} />
                        <span style={{ color: "red" }}>{myFormik.errors.group}</span>
                    </div>

                    <div className='col-lg-4'>
                        <label>Niveau</label>
                        <input name='level' value={myFormik.values.level} onChange={myFormik.handleChange} type={"text"}
                            className={`form-control ${myFormik.errors.level ? "is-invalid" : ""} `} />
                        <span style={{ color: "red" }}>{myFormik.errors.level}</span>
                    </div>

                    <div className='col-lg-4'>
                        <label>Numéro de téléphone</label>
                        <input name='phone' value={myFormik.values.phone} onChange={myFormik.handleChange} type={"text"}
                            className={`form-control ${myFormik.errors.phone ? "is-invalid" : ""} `} />
                        <span style={{ color: "red" }}>{myFormik.errors.phone}</span>
                    </div>

                    <div className='col-lg-4 mt-3'>
                        <input disabled={isLoading} type="submit" value={isLoading ? "En cours..." : "Créer"} className=' btn btn-primary' />
                    </div>
                </div>
            </form>
        </div>
    );
}

export default UserCreate;
