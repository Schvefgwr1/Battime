import React, { useState, useEffect } from "react";
import {useCookies} from "react-cookie";

import './../../Css/main.css';

import {UpdateUserRequest} from "../../WebRequests/UpdateUserRequest";
import {GetProfileRequest} from "../../WebRequests/GetProfileRequest";

import EditPage from "./EditPage";
import MainPage from "./MainPage";
import ErrorPage from "./ErrorPage";
import LoadingPage from "./LoadingPage";
import {useNavigate} from "react-router-dom";


export default function ProfileUserMobile() {

  const navigate = useNavigate();
  const [cookies, setCookie] = useCookies(["pass"]);

  const [file, setFile] = useState(null);

  const [state, setState] = useState("main");
  const handleChangeState= (num)=>{
    setState(num);
  }

  const [show, setShow] = useState(false);
  const handleChangeShow= ()=>{
    if(!show) {
      setShow(true);
    }
    else {
      setShow(false);
    }
  }

  const handleUseRequest = () => {
    const request = UpdateUserRequest(
        [file, phoneNumber, firstName, lastName, email],
        cookies,
        setState,
        setINeedToLoad
    );
  }

  const handleUseRequest2 = () => {
    const request = GetProfileRequest(
        cookies, setState,
        setPhoneNumber,
        setFileLink,
        setFirstName,
        setLastName,
        setEmail
    )
  }

  const [phoneNumber, setPhoneNumber]=useState();
  const [firstName, setFirstName] = useState();
  const [lastName, setLastName] = useState();
  const [email, setEmail] = useState();
  const [file_link, setFileLink] = useState();

  const handleInputPhoneNumber = (event)=>{
    setPhoneNumber(event.target.value);
  }
  const handleChangeFirstName = (event)=>{
    setFirstName(event.target.value);
  }
  const handleChangeLastName = (event)=>{
    setLastName(event.target.value);
  }
  const handleChangeEmailName = (event)=>{
    setEmail(event.target.value);
  }

  const [i_need_to_load, setINeedToLoad] = useState(1);

  useEffect(() => {
    if(i_need_to_load === 1) {
      handleUseRequest2();
      setINeedToLoad(0);
    }
  }, [i_need_to_load]);

  switch (state) {
    case 'main':
      return (
          <div>
            {MainPage(
                handleChangeState,
                file_link,
                phoneNumber,
                firstName,
                lastName,
                email,
                navigate
            )}
          </div>
      );
    case "edit":
      return (
          <div>
            {EditPage(
                show, handleChangeShow,
                email, setEmail, handleChangeEmailName,
                file, setFile,
                firstName, setFirstName, handleChangeFirstName,
                lastName, setLastName, handleChangeLastName,
                phoneNumber, setPhoneNumber, handleInputPhoneNumber,
                handleChangeState, handleUseRequest
            )}
          </div>
      );
    case "loading":
      return (
        <div>
          {LoadingPage()}
        </div>
      );
    case "error":
      return (
          <div>
            {ErrorPage(setState)}
          </div>
      )
  }
}
