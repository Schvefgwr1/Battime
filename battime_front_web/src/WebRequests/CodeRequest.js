import axios from "axios";


export const CodeRequest= async (PhoneNumber, setError, setState, navigateToCodePage)=> {

    setState('loading');
    let url =   process.env.REACT_APP_URL + '/userauth';
    let params = {
        Users_NumberPhone: PhoneNumber,
    }
    let headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
    const request = await axios.post(
        url,
        params,
        {
            headers:headers,
        },
    ).then(
        res => {
            navigateToCodePage();
        }
    ).catch(
        (error)=>{
            console.log(error);
            setError('An Error Occurred. Please try again.');
            setState('using');

        }
    )
}
