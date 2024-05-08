// UserEdit.js
import axios from 'axios';
import { useFormik } from 'formik';
import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';

function UserEdit() {
    const params = useParams();
    const [isLoading, setLoading] = useState(false);
    const navigate = useNavigate();

    const [userData, setUserData] = useState({
        username: '',
        email: '',
        group: '',
        level: '',
        phone: ''
    });

    useEffect(() => {
        getUserData();
    }, []);

    let getUserData = async () => {
        try {
            const user = await axios.get(`https://63a9bccb7d7edb3ae616b639.mockapi.io/users/${params.id}`);
            setUserData(user.data);
            setLoading(false);
        } catch (error) {
            console.log(error);
        }
    };

    const myFormik = useFormik({
        initialValues: {
            username: userData.username,
            email: userData.email,
            group: userData.group,
            level: userData.level,
            phone: userData.phone
        },
        // Validating Forms while entering the data
        validate: (values) => {
            let errors = {};

            if (!values.username) {
                errors.username = "Please enter username";
            } else if (values.username.length < 5) {
                errors.username = "Name shouldn't be less than 3 letters";
            } else if (values.username.length > 25) {
                errors.username = "Name shouldn't be more than 20 letters";
            }

            if (!values.email) {
                errors.email = "Please enter email";
            } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.email)) {
                errors.email = 'Invalid email address';
            }

            return errors;
        },

        onSubmit: async (values) => {
            try {
                setLoading(true);
                await axios.put(`https://63a9bccb7d7edb3ae616b639.mockapi.io/users/${params.id}`, values);
                setLoading(false);
                navigate("/Admin/portal/user-list");
            } catch (error) {
                console.log(error);
                setLoading(false);
            }
        }
    });

    return (
        <>
            <h3>UserEdit - Id : {params.id} </h3>
            <div className='container'>
                <form onSubmit={myFormik.handleSubmit}>
                    <div className='row'>
                        <div className="col-lg-6">
                            <label>Name</label>
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
                            <label>Group</label>
                            <input name='group' value={myFormik.values.group} onChange={myFormik.handleChange} type={"text"}
                                className={`form-control ${myFormik.errors.group ? "is-invalid" : ""} `} />
                            <span style={{ color: "red" }}>{myFormik.errors.group}</span>
                        </div>

                        <div className='col-lg-4'>
                            <label>Level</label>
                            <input name='level' value={myFormik.values.level} onChange={myFormik.handleChange} type={"text"}
                                className={`form-control ${myFormik.errors.level ? "is-invalid" : ""} `} />
                            <span style={{ color: "red" }}>{myFormik.errors.level}</span>
                        </div>

                        <div className='col-lg-4'>
                            <label>Phone Number</label>
                            <input name='phone' value={myFormik.values.phone} onChange={myFormik.handleChange} type={"text"}
                                className={`form-control ${myFormik.errors.phone ? "is-invalid" : ""} `} />
                            <span style={{ color: "red" }}>{myFormik.errors.phone}</span>
                        </div>

                    </div>
                    <div className='col-lg-4 mt-3'>
                        <input disabled={isLoading} type="submit" value={isLoading ? "Updating..." : "Update"} className=' btn btn-primary' />
                    </div>
                </form>
            </div>
        </>
    );
}

export default UserEdit;
