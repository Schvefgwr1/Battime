import React from "react";

import './../../Css/main.css';
import "../../Css/Profile_user_mobile/ProfileUserMobile.css";
import "../../Css/Profile_user_mobile/MainPage.css";


export default function MainPage(
    handleChangeState,
    file_link,
    phoneNumber,
    firstName,
    lastName,
    email,
    navigate
) {

    const handleNavigateToMap = () => {
        navigate("/map");
    }

    if(file_link && phoneNumber && firstName && lastName && email) {
        return (
            <div className="main-block">
                <div className="FirstBlock">
                    <div className="ButtonBack">
                        <div className="BackButton" onClick={handleNavigateToMap}>
                            <p className="Back-Text">Back</p>
                        </div>
                    </div>
                    <div className="NamePage">
                        <div className="Back-Text">Profile</div>
                    </div>
                </div>
                <div className="SecondBlock">
                    <div className="FigmaCont">
                        <img src={require("../../Components/img/figmagif2Obr.png")} className="Img2"/>
                    </div>
                    <div className="img_profile_contener" style={{backgroundImage: `url("${file_link}")`}}>
                    </div>
                </div>
                <div className="ThirdBlock">
                    <div className="MainContenerInputs">
                        <p className="CrossBar" style={{fontStyle: "italic"}}>Phone number</p>
                        <div className="content_div">{phoneNumber}</div>
                    </div>
                    <div className="MainContenerInputs">
                        <p className="CrossBar" style={{fontStyle: "italic"}}>Firstname</p>
                        <div className="content_div">{firstName}</div>
                    </div>
                    <div className="MainContenerInputs">
                        <p className="CrossBar" style={{fontStyle: "italic"}}>Lastname</p>
                        <div className="content_div">{lastName}</div>
                    </div>
                    <div className="MainContenerInputs">
                        <p className="CrossBar" style={{fontStyle: "italic"}}>Email</p>
                        <div className="content_div">{email}</div>
                    </div>
                    <div className="SaveButtonContener">
                        <button className="add-button" onClick={() => {handleChangeState("edit")}}>
                            <p className="add-button-text">Edit profile</p>
                        </button>
                    </div>
                </div>
            </div>
        )
    }
    else {
        return (
            <div className="main-block">
                <div className="main-block1">
                    <div className="back-button-block">
                        <button className="back-button" onClick={handleNavigateToMap}>
                            <p className="back-button-text">Back</p>
                        </button>
                    </div>
                    <div className="back-button-block1">
                        <p className="profile-text">Profile</p>
                    </div>
                    <div className="back-button-block2">
                        <button className="back-button2">
                            <p className="back-button-text">
                            </p>
                        </button>
                    </div>
                </div>
                <div className="main-block2">
                    <div className="main1">
                        <div className="img">
                            <div className="ImgContener">
                                <div className="FigmaCont">
                                    <img src={require("../../Components/img/figmagif2Obr.png")} className="Img2"/>
                                </div>
                                <img src={require("../../Components/img/ProfileVector.png")} className="Img"/>
                            </div>
                            <p className="TextInput5">unknown</p>
                        </div>

                    </div>
                    <div className="main2">
                        <button className="add-button" onClick={() => {handleChangeState("edit")}}>
                            <p className="add-button-text">Add information to profile</p>
                        </button>

                        <p className="text5">
                            This information is necessary if you want to bust your app or get
                            access to all functionalities
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}