import React, {useState} from "react";
import '../../../Css/main.css';
import FilterElement from "./FilterElement";
import SuggestionElement from "./SuggestionElement";

const test_data_suggestion = [
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "11KM"
    },
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "6KM"
    },
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "6KM"
    },
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "6KM"
    },
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "6KM"
    },
    {
        name: "Bizi",
        address:"56 prospect, Moscow",
        icon: "1",
        distance: "6KM"
    },

]

function SuggestionMap({data}) {
    if(data.length > 0) {
        const SuggestionMap = data.map((suggestion) =>
            <SuggestionElement suggestion={suggestion}/>
        )
        return SuggestionMap;
    }
}
export default function ListOfSuggestion({data}){

    return(
        <SuggestionMap data={data}/>
    )
}