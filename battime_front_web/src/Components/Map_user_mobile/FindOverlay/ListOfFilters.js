import React from "react";
import '../../../Css/main.css';
import FilterElement from "./FilterElement";


function CategoryMap({data, selectedFilters}){
    if(data.category?.length > 0) {
        return data.category.map((category) => <FilterMap data={category} selectedFilters={selectedFilters}/>);
    }
}

function FilterMap({data, selectedFilters}){
    console.log(Object.keys(data))
    let name = Object.keys(data)[0]
    console.log(data[name])
    return data[name].map((filter) => <FilterElement filter={filter} selectedFilters={selectedFilters}/>)
}
export default function ListOfFilters({filters, selectedFilters}){

    return(
        <div className="line-of-filters">
            <CategoryMap data={filters} selectedFilters={selectedFilters}/>
        </div>
    )
}
