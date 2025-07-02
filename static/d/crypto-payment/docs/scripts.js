// Vin tutorial launcher
// sel('#vinTutorialCaller').onclick = (e) => {
//     e.preventDefault();
//     launchPopUp('vin-tutorial');
// }
// sel('#pricingTutorialCaller').onclick = (e) => {
//     e.preventDefault();
//     launchPopUp('pricing-tutorial');
// }

const getNetworkName = {
    etharb: 'Network: Arbitrum One (ETH on Arbitrum)',
    ethbase: 'Network: Base Network (ETH on Base)',
    usdtton: 'Network: TON Blockchain (USDT on TON)',
    usdtmatic: 'Network: MATIC Polygon POS (USDT on Polygon)',
    usdtop: 'Network: Optimism (USDT on Optimism)',
    usdttrc20: 'Network: TRON Network (TRC-20) (USDT on TRON)',
    usdtsol: 'Network: Solana Blockchain (USDT on Solana)',
    usdtarb: 'Network: Arbitrum One (USDT on Arbitrum)',
    usdcbase: 'Network: Base Network (USDC on Base)',
    usdcop: 'Network: Optimism (USDC on Optimism)',
    usdcmatic: 'Network: MATIC Polygon PoS (USDC on Polygon)',
    usdcsol: 'Network: Solana Blockchain (USDC on Solana)',
    usdcarb: 'Network: Arbitrum One (USDC on Arbitrum)'
}

// Network selection availibilicy
const coinsSelector = sel('#coinsSelector'),
    networkSelector = sel('#networkSelection'),
    rawCoins = JSON.parse(coinsSelector.dataset.availableCoins);

let relativeNetworks = {'': [''], eth: [], usdt: [], usdc: []};
rawCoins.forEach(element => {
    if(element.startsWith('eth'))
        relativeNetworks.eth.push(element);

    else if(element.startsWith('usdt'))
        relativeNetworks.usdt.push(element);

    else if(element.startsWith('usdc'))
        relativeNetworks.usdc.push(element);
});

coinsSelector.oninput = ()=>{
    // coinsSelector.op
    const currentOptions = networkSelector.querySelectorAll('.supportedNetwork');
    for(let index=0; index<currentOptions.length; index++){
        currentOptions[index].remove();
    }

    const selectedCoin = coinsSelector.value;
    relativeNetworks[selectedCoin].forEach(networkCode=>{
        const newOption = document.createElement('option');
        newOption.value=networkCode;
        newOption.innerText = getNetworkName[networkCode];
        newOption.classList.add('supportedNetwork');

        networkSelector.appendChild(newOption);
    });
}
coinsSelector.oninput();