import React from "react";
import Filters from "./Filters/Filters";


export default function MenuDescription(
    {description, filters}
) {

    //let filters = ["Vodka", "Seledka", "Pivo", "Ighfh", "Ffgdgdf", "Qwerty", "Rdfgdgf"]

    return (
        <div className="main-desc-contener">
            <Filters filters={filters}/>
            <div className="text-contener">
                <div className="title-description">
                    О ЗАВЕДЕНИИ
                </div>
                <div className="text-description">
                    {description}
                </div>
            </div>
        </div>
    )
}