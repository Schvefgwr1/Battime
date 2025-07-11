import React, {useState} from "react";
import "../../Css/Map_user_mobile/MenuButtons.css";
import { Navigate } from 'react-router-dom';

export default function MenuButtons(
    handleChangeOverlayFindState,
    navigateState,
    handleChangeNavigateState
) {

    return(
        <div className="menu_buttons">
            <div className="left_button_cont">
                <div className="button" id="profile_button" onClick={() => {
                    handleChangeNavigateState();
                }}>
                    <img src={require("../img/profile_button.png")}/>
                    {navigateState && <Navigate to="/profile"/>}
                </div>
            </div>
            <div className="right_buttons">
                <div className="right_button_cont">
                    <div className="button" onClick={()=>handleChangeOverlayFindState(1)}>
                        <img src={require("../img/find_button.png")}/>
                    </div>
                </div>
                <div className="right_button_cont">
                    <div className="button">
                        <img src={require("../img/filter_button.png")}/>
                    </div>
                </div>
            </div>
        </div>
    )
}