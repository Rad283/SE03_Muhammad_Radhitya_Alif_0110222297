const showDownload = (result) => {
  console.log(`Download Selesai`);
  console.log(`Hasil Download ${result}`);
};

const download = (callShowDownload) => {

  return new Promise(resolve => {
    setTimeout(() => {
      const result = `windows-10.exe`;
      resolve(callShowDownload(result))
    }, `3000`)
  })
}


const main = async () => {
  await download(showDownload);
}

main()