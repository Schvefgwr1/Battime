import React, {useEffect, useState} from "react";
import {Drawer} from "antd";
import '../../../Css/main.css';
import SearchIcon1 from '../../img/SearchIcon1.png'
import {LeftCircleOutlined} from "@ant-design/icons";
import SuggestionElement from "./SuggestionElement";
import ListOfFilters from "./ListOfFilters";
import ListOfSuggestion from "./ListOfSuggestion";
import DrawerListOfSuggestions from "./DrawerListOfSuggestions";
import DrawerLoading from "./DrawerLoading";
import DrawerSelectFilters from "./DrawerSelectFilters";
import {test_data_filters} from "./data"
import {GetFiltersRequest} from "../../../WebRequests/GetFiltersRequest";
import {useCookies} from "react-cookie";
import {GetEstablishmentWithFilters} from "../../../WebRequests/GetEstablishmentWithFilters";


export default function FindOverlay({overlay_find_state, setOverlayFindState, center}) {
    const [cookies, setCookies] = useCookies(["pass"]);
    const [needToUpdate, setNeedToUpdate] = useState(true);
    const [currentFindPage, setCurrentFindPage] = useState(0);
    const [suggestions, setSuggestions] = useState(false);
    const [filters, setFilters] = useState(test_data_filters);
    const [selectedFilters, setSelectedFilters]=useState(['ROCK', 'ROCK'])
    //localStorage.setItem('items', JSON.stringify(items));
    useEffect(()=>{
        console.log('test')

        if(needToUpdate){
            GetFiltersRequest(cookies, setCurrentFindPage, setFilters);
            let temp = localStorage.getItem('selectedFilters')
            //console.log(temp)
            //console.log(typeof temp)
            let array = JSON.parse(temp);
            //console.log(array)
            //console.log(typeof array)
            if (temp) {
                setSelectedFilters(array)
            } else{
                setSelectedFilters([])
            }
            GetEstablishmentWithFilters(cookies, selectedFilters, setSuggestions, setCurrentFindPage, center);
            setNeedToUpdate(false);
        }
    },[needToUpdate])
    if (currentFindPage===0){
        return(
            <Drawer
                placement='bottom'
                closable={false}
                onClose={()=> setOverlayFindState(0)}
                open={overlay_find_state}
                key='bottom'
            >
                <DrawerListOfSuggestions
                    filters={filters}
                    selectedFilters={selectedFilters}
                    setCurrentFindPage={setCurrentFindPage}
                    setNeedToUpdate={setNeedToUpdate}
                    suggestions={suggestions}
                />
            </Drawer>
        )
    } else if (currentFindPage=== 1){
        return(
            <Drawer
                placement='bottom'
                closable={false}
                onClose={()=> setOverlayFindState(0)}
                open={overlay_find_state}
                key='bottom'
            >
                <DrawerSelectFilters filters={filters} selectedFilters={selectedFilters} setCurrentFindPage={setCurrentFindPage} setSelectedFilters={setSelectedFilters}/>
            </Drawer>
        )
    } else if (currentFindPage===2){
        return(
            <Drawer
                placement='bottom'
                closable={false}
                onClose={()=> setOverlayFindState(0)}
                open={overlay_find_state}
                key='bottom'
            >
                <DrawerLoading/>
            </Drawer>
        )
    }

}