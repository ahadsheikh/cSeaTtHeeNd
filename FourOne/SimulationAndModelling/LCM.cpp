#include <iostream>
#include <vector>
using namespace std;


vector<int> lcm(int seed, int a, int c, int m, int n) {
    vector<int> result;
    for(int i = 0; i < n; i++) {
        seed = (a * seed + c) % m;
        result.push_back(seed);
    }
    return result;
}

int main(int argc, char** argv){
    int seed, a, c, m, n;
    cout << "Enter seed, a, c, m, n: ";
    cin >> seed >> a >> c >> m >> n;
    vector<int> result = lcm(seed, a, c, m, n);
    for(auto &v : result) {
        cout << v << " ";
    }
    putchar('\n');
    return 0;
}