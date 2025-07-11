import React, {useState} from "react";
import '../../../Css/main.css';
import ListOfFilters from "./ListOfFilters";
import ListOfSuggestion from "./ListOfSuggestion";
import {LeftOutlined} from "@ant-design/icons";
import ListOfFiltersSelect from "./ListOfCategoriesAndFilters";

export default function DrawerSelectFilters({filters, selectedFilters, setCurrentFindPage, setSelectedFilters}){
    return(
        <div className="find-overlay-container">
            <div className="contener-swipe-line">
                <div className="swipe-line"></div>
            </div>
            <div className='back-button-block-2'>
                <button className='back-button-2' onClick={()=>setCurrentFindPage(0)}>
                    <LeftOutlined style={{ fontSize: '25px', color: '#161927' }}/>
                </button>
            </div>
            <div className='select-filters-list'>
                <ListOfFiltersSelect  filters={filters} selectedFilters={selectedFilters} setSelectedFilters={setSelectedFilters}/>
            </div>
            <div className='select-filters-submit'>

            </div>
        </div>
    )
}