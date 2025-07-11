import axios from "axios";


export const GetFiltersRequest = async (
    cookies,
    setCurrentFindPage,
    setFilters
)=> {
    setCurrentFindPage(2)
    let url= process.env.REACT_APP_URL + '/get_filters';
    let headers = {
        Accept: 'application/json',
        Authorization: "Bearer " + cookies?.pass,
    }
    const request = await axios.get(
        url,
        {
            headers:headers,
        },
    ).then(
        res => {
            console.log(res.data);
            setFilters(res?.data);
            setCurrentFindPage(0)
        }
    ).catch(
        (error)=>{
            console.log(error)
            setCurrentFindPage(1)
        }
    )
}