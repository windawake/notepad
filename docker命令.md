//编译c <br/>
docker run --rm -v "$PWD":/code -w /code gcc:latest gcc -o demo demo.c

//编译go <br/>
docker run --rm -v "$PWD":/code -w /code golang:latest go run demo.go

