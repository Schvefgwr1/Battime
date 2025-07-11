import React from "react";
import "../../Css/Profile_user_mobile/Overlay.css";


export default function Overlay(handleChangeShow, setFile) {

    const handleFileSelected = (event) => {
        console.log(event);
        setFile(event.target.files[0]);
        console.log(event.target.files[0]);
    }

    return (
        <div className="main">
            <div className="contener">
                <label className="custom-file-upload">
                    <input type="file" accept="image/png" onChange={handleFileSelected}/>
                    Select
                </label>
                <div className="upload-button" onClick={handleChangeShow}>
                    Upload
                </div>
            </div>
        </div>
    )
}