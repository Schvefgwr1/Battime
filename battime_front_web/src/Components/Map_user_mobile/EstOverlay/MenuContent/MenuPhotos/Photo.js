import React from "react";


export default function Photo({name}) {
    return (
        <img src={name} className="menu-photo"/>
    )
}