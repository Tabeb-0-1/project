
    if (typeof window.ethereum !== 'undefined') {
        console.log('MetaMask is installed!');
    }
    const ethereumButton = document.querySelector('.enableEthereumButton');
    ethereumButton.addEventListener('click', () => {
        ethereum.request({method: 'eth_requestAccounts'});
    });
    function hideme() {
        if(typeof window.ethereum !== 'connected') {
            document.getElementById("Connect").style.display = "inline";
        }
        else {
            document.getElementById("Connect").style.display="none";
        }
}












