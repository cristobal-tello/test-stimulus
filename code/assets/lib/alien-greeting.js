import '../styles/alien-greeting.css';


export default function(message, inPeace = false)
{
    setTimeout(function() {
        console.log('This runs after 4 seconds');
        import('../styles/another.css');
        
    }, 4000); 
    
    console.log(`${message}!!, we're ${inPeace?'good':'bad'}`);
}