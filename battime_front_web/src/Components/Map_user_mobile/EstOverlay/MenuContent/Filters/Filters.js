import React from "react";
import Filter from "./Filter";


export default function Filters({filters}) {

    const listOfFilters = (names) => {
        if(names?.length === 0 || names == null) {
            return <div className="filters-line"></div>
        }
        else {
            return names.map((name) =>
                <div className="filters-line">
                    <Filter text={name}/>
                </div>
            )
        }
    }

    return (
        <div className="filters-contener">
            {listOfFilters(filters)}
        </div>
    )
}