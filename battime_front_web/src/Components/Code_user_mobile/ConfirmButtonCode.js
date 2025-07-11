import React, {useState} from "react";
import './../../Css/main.css';

export default function ConfirmButtonCode({codeValidation,handleClickSend}){
    if (codeValidation){
        return(
            <button  className='confirmtrue' onClick={handleClickSend}>
                    Confirm
            </button>
        )
    } 
    else{
        return(
            <button  className='confirm'>
                    Confirm
            </button>
        )
    }
}