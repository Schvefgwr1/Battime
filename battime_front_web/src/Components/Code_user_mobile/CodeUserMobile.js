import React, {useState} from "react";
import './../../Css/main.css';
import {CodeVerify} from "../../WebRequests/CodeVerify";
import point from './../img/figmagif1.png'
import ConfirmButtonCode from "./ConfirmButtonCode";
import {CookiesProvider, useCookies} from "react-cookie";
import {Navigate, useNavigate} from "react-router-dom";

export default function CodeUserMobile(){

    const navigate = useNavigate();
    const [cookies, setCookie] = useCookies(["pass"]);
    const [Sms, setSms]=useState();
    const [codeValidation, setCodeValidation]=useState(false);
    const [stateNavigation, setStateNavigation] = useState(false);
    const handleInputSms= (event)=>{ 
        setSms(event.target.value)
        setCodeValidation(event.target.value.match(/^\d{6}$/));
    }
    const handleClickSend = ()=>{
        const request = CodeVerify(Sms, setCookie, cookies, setStateNavigation);
    }
    const handleClickNavigateToLogin = () => {
        navigate("/");
    }
    return(
        <div className='main-box'>
            <div className='up-block'>
                <div className='up-block1'>
                <button  className='back-button' onClick={handleClickNavigateToLogin}>
                    Back
                </button>
                </div>
                <div className='code'>
                    Code confirmation
                </div>
                <div className='text'>
                    You will receive an verification code to verify your identity
                </div>
                <div className='input-group'>
                    <label htmlFor='phone' className='white'>Code confirmation</label>
                    <input  className='input-group-input' id='phone' onChange={handleInputSms} value={Sms}/>
                </div>

            </div>
            <div className='down-block'>
                <div className='button-block'>
                    <ConfirmButtonCode codeValidation={codeValidation} handleClickSend={handleClickSend}/>
                    {stateNavigation && <Navigate to="/map" replace={true}/>}
                    <button  className='send' onClick={handleClickSend}>
                        Send the code again
                    </button>
                </div>
            </div>
        </div>
)}
            