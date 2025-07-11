import React, {useState} from "react";
import './../../Css/main.css';
import {CodeRequest} from "../../WebRequests/CodeRequest";
import point from './../img/figmagif1.png'
import {useNavigate} from "react-router-dom";

export default function LoginAllMobile(  ){
    const navigate = useNavigate();

    const [phoneNumber, setPhoneNumber]=useState();
    const [error, setError]=useState('');
    const [state, setState]=useState('using');
    const [needToUpdate, setNeedToUpdate]=useState(false);
    const handleInputPhoneNumber= (event)=>{
        setPhoneNumber(event.target.value)
        //console.log('phone number');
        //console.log(phoneNumber)
    }

    const navigateToCodePage=()=>{
        navigate('/code');
    }
    const handleClickSend = ()=>{
        const request = CodeRequest(phoneNumber, setError, setState, navigateToCodePage);
    }
    if(state==='using'){
        return(
            <div className='login-main-box'>
                <div className='h1 white'>
                    Welcome to battime  App!
                </div>
                <div className='white login-main-box-element-top-margin normal'>
                    Identify youself with your phone number
                </div>
                <div className=' login-main-box-element-top-margin'>
                    <div className='input-group'>
                        <label htmlFor='phone' className='white'>Phone number</label>
                        <input  className='input-group-input' id='phone' onChange={handleInputPhoneNumber} value={phoneNumber}/>
                    </div>
                </div>
                <div className='red h5'>
                    {error}
                </div>
                <div className=' login-main-box-element-top-margin-button'>
                    <button  className='button-blue-active' onClick={handleClickSend}>
                        Send me a code
                    </button>
                </div>
                <div  className=' login-main-box-element-top-margin'>
                    <img src={point} className='point'/>
                </div>
            </div>
        )
    } else if(state==='loading'){
        return(
            <div className='login-main-box'>
                <div className='h1 white'>
                    Loading...
                </div>
            </div>
        )
    }

}
