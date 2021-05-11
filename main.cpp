#include <iostream>
#include <vector>

using namespace std;

int main(int argc, char const *argv[]) {
    vector<int> arr = {}; //1008, -374, -585, -59, 9, 1
    vector<int> divisor;
    vector<int> ans;
    for (int i = 1; i * i <= abs(arr[0]); i++) {
        if (arr[0] % i == 0) {
            divisor.push_back(i);
            divisor.push_back(arr[0] / i);
            divisor.push_back(-i);
            divisor.push_back(-(arr[0] / i));
        }
    }
    for (auto it: divisor) {
        int sum = 0;
        for (int i = arr.size() - 1; i > 0; i--) {
            int t = it;
            int s = t;
            for (int j = 1; j < i; j++) {
                s *= t;
            }
            sum += s * arr[i];
        }
        sum += arr[0];
        if (sum == 0) {
            ans.push_back(it);
        }
    }
    for (auto it: ans) {
        cout << it << " ";
    }
    return 0;
}
