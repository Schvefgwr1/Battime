import React from "react";


export default function Input(name, con, handle) {
    if(!con) {
        return (
            <div className="MainContenerInputs">
                <input className='inputThirdB' onChange={handle} value={con}
                       placeholder={name} id='s_inp'/>
            </div>
        )
    }
    else {
        return (
            <div className="MainContenerInputs">
                <p className="CrossBar" style={{fontStyle: "italic"}}>{name}</p>
                <input className='inputThird' onChange={handle} value={con} id='s_inp'/>
            </div>
        )
    }
}