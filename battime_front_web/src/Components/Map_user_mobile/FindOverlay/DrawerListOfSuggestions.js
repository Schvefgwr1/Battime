import React, {useState} from "react";
import '../../../Css/main.css';
import ListOfFilters from "./ListOfFilters";
import ListOfSuggestion from "./ListOfSuggestion";


export default function DrawerListOfSuggestions({filters, selectedFilters, setCurrentFindPage, setNeedToUpdate, suggestions}) {
    return(
        <div className="find-overlay-container">
            <div className="contener-swipe-line">
                <div className="swipe-line"></div>
            </div>
            <div className="container-search-establishment">
                <div className='input-group-search  '>
                    <label htmlFor='search' className='white-search'>Search</label>
                    <input  className='input-group-input-search' id='search'/>
                </div>
            </div>
            <div className='filter-button-block'>
                <button onClick={()=>setCurrentFindPage(1)} className='add-filters-button'>
                    Add Filters+
                </button>
            </div>
            <div className="filter-block">
                <ListOfFilters filters={filters} selectedFilters={selectedFilters}/>
            </div>
            <div className="suggestions-search-container">
                <ListOfSuggestion data={suggestions}/>
            </div>
            <div className="button-send-contener">
                <button className='button-blue-active' onClick={() => setNeedToUpdate(true)}>
                    Search
                </button>
            </div>
        </div>
    )
}