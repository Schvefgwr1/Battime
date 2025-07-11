import React, {useState} from "react";
import '../../../Css/main.css';

export default function FilterElement({filter, selectedFilters}){
    console.log(filter)
    if (selectedFilters.find(ele => ele === filter.id)){
        return(
            <div className='filter-element'>
                {filter.label}
            </div>
        )
    }

}