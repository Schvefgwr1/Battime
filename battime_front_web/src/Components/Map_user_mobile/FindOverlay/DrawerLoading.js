import React, {useState} from "react";
import '../../../Css/main.css';
import ListOfFilters from "./ListOfFilters";
import ListOfSuggestion from "./ListOfSuggestion";

export default function DrawerLoading(){
    return(
        <div className="find-overlay-container">
            <div className='h1 white'>
                Loading...
            </div>
        </div>
    )
}