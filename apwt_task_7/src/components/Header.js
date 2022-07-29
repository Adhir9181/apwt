import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {Router, Route,Routes} from "react-router-dom";
import Home from "./Home";
import Register from "./Register";
import StudentList from "./StudentList";
import Navbar from "./Navbar";
import axios from "axios";
import Student from "./Student";

axios.defaults.baseURL="http://127.0.0.1:8000/api/";

function Header(){
    return (
        <div className="container">
            <Navbar/>
            <Routes>
                <Route index element={<Home name="ASHRAFUL ISLAM ADHIR" university="AIUB" framework="React JS" />} />
                <Route path="/home" element={<Home name="ASHRAFUL ISLAM ADHIR" university="AIUB" framework="React JS"/>}/>
                <Route path="/register" element={<Register/>} />
                <Route path="/studentList" element={<StudentList/>} />
                <Route path="/show/:id" element={<Student/>}></Route>
            </Routes>
        </div>
    )
}

export default Header;