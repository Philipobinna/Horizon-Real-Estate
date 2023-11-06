import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
import Navbar1 from "./components/navbar/Navbar";
import { Route, Routes } from "react-router-dom";
import Home from "./components/pages/Home";
import Login from "./components/pages/Login";
import Signup from "./components/pages/Signup";
import Verify from "./components/pages/Verify";
import Forgot from "./components/pages/Forgot";
import Property from "./components/pages/Property";
import AdminPage from "./components/pages/Admin";
import User from "./components/pages/User";
import Adminpanel from "./components/pages/Adminpanel";

// import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

function App() {
  return (
    <>
      <Navbar1 />

      <Routes>
        <Route path="/" element={<Home />} />

        <Route path="/login" element={<Login changeAuthMode={undefined} />} />

        <Route path="/signup" element={<Signup />} />

        <Route path="/verify" element={<Verify />} />

        <Route path="/forgot" element={<Forgot />} />

        <Route path="/property" element={<Property />} />

        <Route path="/admin" element={<AdminPage />} />

        <Route path="/admin/user" element={<User />} />

        <Route path="/admin1" element={<Adminpanel />} />
      </Routes>
    </>
  );
}

export default App;
