import React, {useEffect, useState} from "react";
import '../../../Css/main.css';


function CategoryMapSelect({data, selectedFilters, setSelectedFilters}){
    if(data.category?.length > 0) {
        return data.category.map((category) =>
            <div className='category-line'>
                <div className='category-name'>{Object.keys(category)[0]}</div>
                <div className='category-line-options'>
                    <FilterMapSelect data={category} selectedFilters={selectedFilters}
                                     setSelectedFilters={setSelectedFilters}/>
                </div>
            </div>)
    }
}

function FilterMapSelect({data, selectedFilters, setSelectedFilters}){
    //console.log(Object.keys(data))
    let name = Object.keys(data)[0]
    //console.log(data[name])
    return data[name].map((filter) => <SelectElement filter={filter} selectedFilters={selectedFilters} setSelectedFilters={setSelectedFilters}/>)
}
export default function ListOfFiltersSelect({filters, selectedFilters, setSelectedFilters}){

    return(
        <div className="line-of-filters">
            <CategoryMapSelect data={filters} selectedFilters={selectedFilters} setSelectedFilters={setSelectedFilters}/>
        </div>
    )
}

function SelectElement({filter, selectedFilters, setSelectedFilters}){
    const [needToreFresh, setNeedToRefresh] = useState(false)
    //console.log(filter)
    const pushFilter =(id)=>{
        const temp = selectedFilters;
        //console.log(temp);
        //console.log(typeof temp)
        temp.push(id)
        setSelectedFilters(temp);
        localStorage.setItem("selectedFilters", JSON.stringify(temp));
        setNeedToRefresh(!needToreFresh)
    }
     const spliceFilter = (id)=>{
         const temp = selectedFilters;
         const index = temp.indexOf(id);
         if (index > -1) { // only splice array when item is found
             temp.splice(index, 1); // 2nd parameter means remove one item only
         }
         setSelectedFilters(temp);
         localStorage.setItem("selectedFilters", JSON.stringify(temp));
         setNeedToRefresh(!needToreFresh)
     }
    if(needToreFresh){
        if (selectedFilters.find(ele => ele === filter.id)){
            return(
                <div className='filter-element' onClick={()=>spliceFilter(filter.id)}>
                    {filter.label}
                </div>
            )
        } else {
            return(
                <div className='filter-element-2' onClick={()=>pushFilter(filter.id)}>
                    {filter.label}
                </div>
            )
        }
    } else {
        if (selectedFilters.find(ele => ele === filter.id)){
            return(
                <div className='filter-element' onClick={()=>spliceFilter(filter.id)}>
                    {filter.label}
                </div>
            )
        } else {
            return(
                <div className='filter-element-2' onClick={()=>pushFilter(filter.id)}>
                    {filter.label}
                </div>
            )
        }
    }


}