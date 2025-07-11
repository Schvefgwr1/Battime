import React from "react";
import Overlay from "./Overlay";
import Inputs from "./Inputs";
import SaveButton from "./SaveButton";
import "../../Css/Profile_user_mobile/ProfileUserMobile.css";
import "../../Css/Profile_user_mobile/MainPage.css";


export default function EditPage(
    show, handleChangeShow,
    email, setEmail, handleChangeEmailName,
    file, setFile,
    firstName, setFirstName, handleChangeFirstName,
    lastName, setLastName, handleChangeLastName,
    phoneNumber, setPhoneNumber, handleInputPhoneNumber,
    handleChangeState, handleUseRequest
) {

    return (
        <div className="main-block">
            <div className="FirstBlock">
                <div className="ButtonBack">
                    <div className="BackButton" onClick={() => {handleChangeState("main");
                        if(show) {
                            handleChangeShow();
                        }
                    }}>
                        <p className="Back-Text">Back</p>
                    </div>
                </div>
                <div className="NamePage">
                    <div className="Back-Text">EDIT PROFILE</div>
                </div>
            </div>
            <div className="SecondBlock">
                <img src={require("../../Components/img/ProfileVector.png")} className="ImgProfileSec"/>
                <img src={require("../../Components/img/BluePlus.png")} className="ImgPlus" onClick={handleChangeShow}/>
                {show && Overlay(handleChangeShow, setFile)}
            </div>
            <div className="ThirdBlock">
                {Inputs(
                    phoneNumber, handleInputPhoneNumber,
                    firstName, handleChangeFirstName,
                    lastName, handleChangeLastName,
                    email, handleChangeEmailName
                )}
                <div className="SaveButtonContener">
                    {SaveButton(file, phoneNumber, firstName, lastName, email, handleUseRequest)}
                </div>
            </div>
        </div>
    )
}