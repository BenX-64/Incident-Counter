#include <iostream>
#include <random>

int main () {
    std::mt19937_64 gen (std::random_device{}());
    std::uint64_t randomNumber = gen();
    std::cout<<randomNumber<<std::endl;
    return 0;
}