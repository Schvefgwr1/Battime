import React, { useState } from "react";
import MenuContener from "./MenuContent/MenuContener";


export default function EstablishmentOverlayMenu(
    {page,
    setPage}
) {

    switch(page) {
        case 0: 
            return(
                <div className="menu__container-list">
                    <button className="menu__container-item-active">
                        <span className="button-text-active">description</span>
                    </button>
                    <button className="menu__container-item" onClick={()=> {setPage(1)}}>
                        <span className="button-text">menu</span>
                    </button>
                    <button className="menu__container-item" onClick={()=> {setPage(2)}}>
                        <span className="button-text">contacts</span>
                    </button>
                </div>
            )
        case 1:
            return(
                <div className="menu__container-list">
                    <button className="menu__container-item" onClick={()=> {setPage(0)}}>
                        <span className="button-text">description</span>
                    </button>
                    <button className="menu__container-item-active">
                        <span className="button-text-active">menu</span>
                    </button>
                    <button className="menu__container-item" onClick={()=> {setPage(2)}}>
                        <span className="button-text">contacts</span>
                    </button>
                </div>
            )
        case 2:
            return(
                <div className="menu__container-list">
                    <button className="menu__container-item" onClick={()=> {setPage(0)}}>
                        <span className="button-text">description</span>
                    </button>
                    <button className="menu__container-item" onClick={()=> {setPage(1)}}>
                        <span className="button-text">menu</span>
                    </button>
                    <button className="menu__container-item-active">
                        <span className="button-text-active">contacts</span>
                    </button>
                </div>
            )
    }
}


