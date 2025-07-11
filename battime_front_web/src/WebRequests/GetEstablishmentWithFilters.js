import axios from "axios";


export const GetEstablishmentWithFilters = async (cookies, filters, setSuggestions, setCurrentPage, center)=> {

    let url =   process.env.REACT_APP_URL + '/get_filtered_establishment';
    setCurrentPage(2);
    console.log(filters);
    let params = {
        'latitude': center[1],
        'longitude': center[0],
        'filters': filters
    }
    let headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': "Bearer " + cookies?.pass
    }
    const request = await axios.post(
        url,
        params,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res?.data);
            setSuggestions(res?.data);
            setCurrentPage(0);
        }
    ).catch(
        (error)=>{
            console.log(error);
        }
    )
}
