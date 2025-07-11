import React from "react";

export default function SaveButton(file, phoneNumber, firstName, lastName, email, handleUseRequest) {
    if(file && phoneNumber && firstName && lastName && email) {
        return (
            <button className="add-button" onClick={handleUseRequest}>
                <p className="add-button-text">Save</p>
            </button>
        )
    } else {
        return (
            <button className="add-button" id="inactive">
                <p className="add-button-text">Save</p>
            </button>
        )
    }
}